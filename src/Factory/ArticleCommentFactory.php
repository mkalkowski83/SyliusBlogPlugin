<?php

declare(strict_types=1);

namespace Odiseo\SyliusBlogPlugin\Factory;

use Odiseo\BlogBundle\Factory\ArticleCommentFactoryInterface;
use Odiseo\BlogBundle\Model\ArticleCommentInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class ArticleCommentFactory implements ArticleCommentFactoryInterface
{
    /** @var FactoryInterface  */
    private $decoratedFactory;

    /** @var ShopUserInterface|object|string|null */
    private $shopUser;

    public function __construct(
        FactoryInterface $decoratedFactory,
        TokenStorageInterface $tokenStorage
    ) {
        $this->decoratedFactory = $decoratedFactory;

        $token = $tokenStorage->getToken();
        $this->shopUser = $token ? $token->getUser() : null;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew(): object
    {
        return $this->decoratedFactory->createNew();
    }

    /**
     * {@inheritdoc}
     */
    public function createNewWithArticleOrComment(string $articleId, string $commentId = null): ArticleCommentInterface
    {
        /** @var \Odiseo\SyliusBlogPlugin\Entity\ArticleCommentInterface $articleComment */
        $articleComment = $this->decoratedFactory->createNewWithArticleOrComment($articleId, $commentId);

        if ($this->shopUser instanceof ShopUserInterface) {
            $articleComment->setAuthor($this->shopUser);
        }

        return $articleComment;
    }
}
