<?php

/**
 * @author Gaëllan
 */

class PageController extends AbstractController
{
    public function preview(array $post)
    {
        if(isset($_POST["data"])) // the form has been submitted
        {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $view = $this->renderPartial("_preview", [
                "title" => $title,
                "content" => $content
            ]);
        }
        else
        {
            $this->render("page_preview", [
            
            ]);
        }
    }
}