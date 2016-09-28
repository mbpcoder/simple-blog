<?php

function hash_make($value)
{
    return md5('myBlog' . $value);
}