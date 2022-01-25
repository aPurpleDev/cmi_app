<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Comments;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment/new", name="create_comment")
     */
    public function createComment(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $comment = new Comments();
        $comment->setComment('it works');
        $comment->setReplies(['a reply']);
        $comment->setRate(1);

        $entityManager->persist($comment);
        $entityManager->flush();

        return new Response('Comment saved with id '.$comment->getId());
    }
}