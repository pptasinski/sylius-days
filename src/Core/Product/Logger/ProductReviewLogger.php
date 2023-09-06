<?php

declare(strict_types=1);

namespace App\Core\Product\Logger;

use App\Entity\Product\ProductInterface;
use Psr\Log\LoggerInterface;
use Sylius\Component\Core\Model\ProductReview;
use Sylius\Component\Review\Model\ReviewInterface;

final class ProductReviewLogger
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function logApproval(ReviewInterface $productReview): void
    {

        if ($productReview instanceof ProductReview) {
            /** @var ProductInterface $product */
            $product = $productReview->getReviewSubject();
            $this->logger->critical(sprintf('Review %d for product %s has been approved.', $productReview->getId(), $product->getCode()));
        }
    }
}
