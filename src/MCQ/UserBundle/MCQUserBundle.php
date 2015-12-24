<?php

namespace MCQ\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MCQUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}