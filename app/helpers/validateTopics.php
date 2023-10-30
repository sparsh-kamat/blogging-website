<?php

function validateTopics($topic)
{
    $errors = array();

    if (empty($topic['topic_name'])) {
        array_push($errors, 'Topic name is required');
    }

    $existingTopic = selectOne('topics', ['name' => $topic['topic_name']]);
    if ($existingTopic) {
        if (isset($topic['update-topic']) && $existingTopic['id'] != $topic['id']) {
            array_push($errors, 'Topic already exists');
        }

        if (isset($topic['create-topic'])) {
            array_push($errors, 'Topic already exists');
        }
    }

    return $errors;
}