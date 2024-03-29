<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\User;

// TOPページのコントローラ
$app->get('/my_ending_note_list/', function (Request $request, Response $response) {

    $data = $request->getQueryParams();

    // $this->db->select("");
    $sql = "select * from user inner join my_ending_note on user.id = my_ending_note.user_id left join profile on user.id = profile.user_id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    $list = $stmt->fetchAll();

    $data =[
        "list" => $list,
    ];

    // Render index view
    return $this->view->render($response, 'my_ending_note_list/my_ending_note_list.twig', $data);
});
