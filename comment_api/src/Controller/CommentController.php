<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Comments;
use App\Service\CommentManager;
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
        $commentManager = new CommentManager();
        $comment = $commentManager->saveComment($doctrine);

        return new Response('Comment saved with id '.$comment->getId());
    }
}