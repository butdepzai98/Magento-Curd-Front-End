<?php
namespace Vinh\Curd\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PostRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \Vinh\Curd\Api\Data\PostInterface $Post
     * @return \Vinh\Curd\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Vinh\Curd\Api\Data\PostInterface $Post);

    /**
     * Retrieve Post.
     *
     * @param int $PostId
     * @return \Vinh\Curd\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($PostId);

    /**
     * Retrieve Posts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Vinh\Curd\Api\Data\PostSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Post.
     *
     * @param \Vinh\Curd\Api\Data\PostInterface $Post
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Vinh\Curd\Api\Data\PostInterface $Post);

    /**
     * Delete Post by ID.
     *
     * @param int $PostId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($PostId);
}