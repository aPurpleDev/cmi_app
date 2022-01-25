<?php

namespace App\Service;

use App\Entity\Comments;
use Doctrine\Persistence\ManagerRegistry;

class CommentManager
{
    public function saveComment(ManagerRegistry $doctrine, string $comment_content = "a comment",
                                array $replies = ['a reply'], int $rate = 0): Comments
    {
        $entityManager = $doctrine->getManager();

        $comment = new Comments();
        $comment->setComment($comment_content);
        $comment->setReplies($replies);
        $comment->setRate($rate);

        $entityManager->persist($comment);
        $entityManager->flush();

        return $comment;
    }
}