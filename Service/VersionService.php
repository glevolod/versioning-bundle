<?php

namespace Glevolod\VersioningBundle\Service;

//TODO: check $returnVar && $output in common private exec method
class VersionService
{
    /**
     * @return string
     */
    public function getBranch()
    {
        $result = exec('cd .. && git branch', $output, $returnVar);
        return substr($result, 2);
    }

    public function getTag()
    {
        $result = exec('git describe --tags', $output, $returnVar);
        return $result;
    }

    public function getTime()
    {
        $timestamp = exec('cd .. && git log -1 --format=%ct');
        return (new \DateTime('@' . $timestamp))->format('Y-m-d H:m:i');
    }

    public function getHash()
    {
        return exec('cd .. && git log -1 --format=%H');
    }

    public function getShortHash()
    {
        return exec('cd .. && git log -1 --format=%h');
    }
}