<?php
// 自定义辅助函数，这里不需要指明命名空间
// configs 查询配置表中的指定数据
function configs($name){
    $content = DB::table("configs")->whereNull("deleted_at")->where("title",$name)->first();
    return ($content->content);
}

// 截图字符串，剩下的用省略号代替
function subtext($text, $length,$shengluehao='......'){
    if(mb_strlen($text, 'utf8') > $length) {
        return mb_substr($text, 0, $length, 'utf8').$shengluehao;
    } else {
        return $text;
    }
}
// $str = '我们是family happy family';
// echo subtext($str,5); //我们是fa...

// 从一个表中根据id，查出一个字段的值
function getTitleFromId($id,$table,$title='title'){
    $res = DB::table($table)->where('id',$id)->first();
    return $res?$res->$title:'';
}


function getUserNameById($id,$ziduan = 'username'){
    $user = DB::table('users')->where('id',"=",$id)->first();
    if(!empty($user)){
        return $user->$ziduan;
    }else{
        return "";
    }
}

function getUserLevel($user_id){
    $user = DB::table('users_roles')->where('user_id',"=",$user_id)->first();
    if(!empty($user)){
        return $user->userrole_id;
    }else{
        return 0;
    }
}

// 根据tagid，查出名称
function getTitleFromTagid($id){
    $tag = DB::table('tags')->where('id', $id)->first();
    return $tag->title??'';
}

// 根据article_id 查出相对应的权限的level
function getLevel($article_id){
    $articles_roles = DB::table('articles_roles')->where('article_id', $article_id)->first();
    if($articles_roles){
        $rolename = DB::table("userroles")->where('level','=',$articles_roles->userrole_id)->first();
        echo $rolename->title;
    }else{
        $rolename = DB::table("userroles")->where('level','=','0')->first();
        echo $rolename->title;
    }
}
function getArticles($ziduan,$desc,$num){
    $articles = DB::table('articles')->orderBy($ziduan,$desc)->limit($num)->get();
    return $articles;
}
function getPages($ziduan,$desc,$num){
    $pages = DB::table("pages")->orderBy($ziduan,$desc)->limit($num)->get();
    return $pages;
}
function getTenArticles($category_id,$ziduan = 'hits',$desc='desc',$num='10'){
    $articles = DB::table("articles")->where('category_id',$category_id)->whereNull('deleted_at')->orderBy($ziduan,$desc)->limit($num)->get();
    return $articles;
}
function getCategoryTitle($category_id){
    $category = DB::table('categories')->where('id',$category_id)->first();
    return $category->title;
}

function getNumFromCategory($category_id){
    return DB::table('articles')->where('category_id',$category_id)->whereNull('deleted_at')->count();
}
function getTotalNumFromArticles(){
    return DB::table('articles')->whereNull('deleted_at')->get()->count();
}

