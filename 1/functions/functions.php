<?php

function sortAndGroupByStudent(array $data): array
{
    $sortData = [];

    if (count($data) <= 1) {
        return $data;
    }

    uasort($data, function ($a, $b): int {
        if ($a[0] == $b[0]) {
            return 0;
        }

        return $a[0] <=> $b[0];
    });

    foreach ($data as $value) {

        $sortData[$value[0]][$value[1]] = isset($sortData[$value[0]][$value[1]])
        ? $sortData[$value[0]][$value[1]] += $value[2]
        : $value[2];
    }

    return $sortData;
}

function getUniqSubjects(array $data): array
{
    $uniqSubs = [];

    foreach ($data as $row) {
        if (!in_array($row[1], $uniqSubs)) {
            array_push($uniqSubs, $row[1]);
        }
    }
    sort($uniqSubs);
    return $uniqSubs;
}
