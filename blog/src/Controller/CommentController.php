<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\User;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

/**
 * @Route("/comment")
 */
class CommentController extends AbstractController
{

    private $mailer;

    private $router;

    public function __construct(MailerInterface $mailer, RouterInterface $router)
    {
//        $this->mailer = $mailer;
//        $this->router = $router;
    }

    /**
     * @Route("/", name="comment_index", methods={"GET"})
     */
    public function index(CommentRepository $commentRepository): Response
    {
        return $this->render('comment/index.html.twig', [
            'comments' => $commentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}/{userId}", name="comment_new", methods={"POST"})
     * @ParamConverter("user", options={"id" = "userId"})
     */
    public function new(Request $request, Article $article, User $user): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $comment->setArticle($article);

            $comment->setName($user);

            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('article_show', ['id' => $article->getId()]);
        }

        return $this->render('comment/new.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/reply/{id}/{commentId}/{userId}", name="add_reply", methods={"POST"})
     * @ParamConverter("comment", options={"id" = "commentId"})
     * @ParamConverter("user", options={"id" = "userId"})
     */
    public function addReply(Request $request, Article $article, Comment $comment, User $user): Response
    {
//        $submittedToken = $request->request->get('token');
//
//        // 'delete-item' is the same value used in the template to generate the token
//        if ($this->isCsrfTokenValid('comment-token', $submittedToken)) {
//            throw new BadRequestException('Bad CSRF token from comment received');
//        }
        $reply = new Comment();
        $entityManager = $this->getDoctrine()->getManager();
        $reply->setArticle($article);
        $reply->setName($user);
        $reply->setReplyTo($comment);
        $body = $request->request->get('body');
        $reply->setBody($body);
        $entityManager->persist($reply);
        $entityManager->flush();
//        $this->sendNotification($reply);
        return $this->redirectToRoute('article_show', ['id' => $article->getId()]);
    }

    /**
     * @Route("/{id}", name="comment_show", methods={"GET"})
     */
    public function show(Comment $comment): Response
    {
        return $this->render('comment/show.html.twig', [
            'comment' => $comment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="comment_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Comment $comment): Response
    {
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comment_index');
        }

        return $this->render('comment/edit.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comment_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Comment $comment): Response
    {
        if ($this->isCsrfTokenValid('delete' . $comment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comment_index');
    }
}

    /**
     * @param Comment $reply
     */
//    public function sendNotification(Comment $reply)
//    {
//        $email = (new TemplatedEmail())
//            ->from('no-reply@symfony.blog.cm')
//            ->to(new Address($reply->getReplyTo()->getUser()->getEmail()))
//            ->subject('Thanks for signing up!')
//
//            // path of the Twig template to render
//            ->htmlTemplate('emails/reply.html.twig')
//
//            // pass variables (name => value) to the template
//            ->context([
//                'reply' => $reply,
//                'page_url' => $this->router->generate(
//                    'article_show',
//                ['id' => $reply->getArticle()->getId()]
//                ),
//                UrlGeneratorInterface::ABSOLUTE_URL
//            ])
//        ;
//        $this->mailer->send($email);
//    }
//}
