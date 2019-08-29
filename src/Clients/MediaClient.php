<?php

namespace ChenDingtalk\Clients;

/**
 * Class MediaClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/bcmg0i
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/wk3krc
 */
class MediaClient extends AbstractClient
{
    /**
     * 上传媒体文件
     * @param $type
     * @param $media
     * @return \stdClass
     */
    public function upload($type, $media)
    {
        return $this->executePost('media/upload', compact('type', 'media'));
    }

    /**
     * 单步文件上传
     * @param $agent_id
     * @param $file_size
     * @param $file
     * @return \StdClass
     */
    public function fileUploadSingle($agent_id, $file_size, $file)
    {
        return $this->executePost('file/upload/single', compact('agent_id', 'file_size'), $file);
    }

    /**
     * 分块上传文件
     * @param $agent_id
     * @param $file_size
     * @param $chunk_numbers
     * @return \StdClass
     */
    public function fileUploadTransaction($agent_id, $file_size, $chunk_numbers)
    {
        return $this->executeGet('file/upload/transaction', compact('agent_id', 'file_size', 'chunk_numbers'));
    }

    /**
     * 上传文件块
     * @param $agent_id
     * @param $upload_id
     * @param $chunk_sequence
     * @param $file
     * @return \StdClass
     */
    public function fileUploadChunk($agent_id, $upload_id, $chunk_sequence, $file)
    {
        return $this->executePost('file/upload/chunk', compact('agent_id', 'upload_id', 'chunk_sequence'), $file);
    }

    /**
     * 提交文件上传事务
     * @param $agent_id
     * @param $file_size
     * @param $chunk_numbers
     * @param $upload_id
     * @return \StdClass
     */
    public function fileUploadCommit($agent_id, $file_size, $chunk_numbers, $upload_id)
    {
        return $this->executeGet('file/upload/transaction', compact('agent_id', 'file_size', 'chunk_numbers', 'upload_id'));
    }
}
