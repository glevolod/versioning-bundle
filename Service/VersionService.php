<?php

namespace Glevolod\VersioningBundle\Service;

class VersionService
{
    /**
     * @return string
     */
    public function getBranch()
    {
        //TODO: check $returnVar && $output in common private exec method
        $result = exec('cd .. && git branch', $output, $returnVar);
        return substr($result, 2);
    }

    public function getTag()
    {
        $result = exec('git describe --abbrev=0', $output, $returnVar);
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