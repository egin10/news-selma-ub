<?php
/**
 * https://github.com/egin10
 * Core function
 * 
 * MIT
 */

class Core {
    
    private function getStringBetween(String $teks, String $sebelum, String $sesudah): String
    {
        $teks = ' '.$teks;
        $ini = strpos($teks, $sebelum);
        if($ini == 0) return '';
        $ini += strlen($sebelum);
        $panjang = strpos($teks, $sesudah, $ini) - $ini;
        return substr($teks, $ini, $panjang);
    }

    public function getBerita(String $url)
    {
        $arr['news'] = [];
        $arr['pages'] = [];
        $result = $this->getStringBetween($url, '<div class="post-meta">', "<div class=\"navigation\">");
        $arrNews = explode('<div id="post-', $result);
        foreach($arrNews as $news)
        {
            $postMonth = trim($this->getStringBetween($news, '<span class="post-month">', '</span>'));
            $postDay = trim($this->getStringBetween($news, '<span class="post-day">', '</span>'));
            $linkPost = trim($this->getStringBetween($news, '<a href="', '" title="'));
            $titlePost = trim($this->getStringBetween($news, '" title="', '">'));
            $contentPost = trim($this->getStringBetween($news, '<p>', '</p>'));
            
            //Get Category Tag of Post
            $strTagPost = trim($this->getStringBetween($news, 'berita/" rel="category tag">', '</div'));
            $arrStrTagPost = explode('<a href="https://selma.ub.ac.id/category/', $strTagPost);
            $arrTagPost = [substr($arrStrTagPost[0], 0, -5)];
            if(count($arrStrTagPost) > 0){
                for($i = 1; $i < count($arrStrTagPost); $i++)
                {
                    $arrTagPost[] = trim($this->getStringBetween($arrStrTagPost[$i], 'rel="category tag">', '</a>'));
                }
            }

            array_push($arr['news'],[
                'postDate'      => $postDay." ".$postMonth,
                'linkPost'      => $linkPost,
                'titlePost'     => $titlePost,
                'contentPost'   => $contentPost,
                'tagPost'       => $arrTagPost,
                // 'news' => $news
            ]);
        }
        $pages = trim($this->getStringBetween($url, '<li class="page_info">Page', '</li>'));
        $firstPage = trim(explode('of',$pages)[0]);
        $lastPage = trim(explode('of',$pages)[1]);
        $arr['pages'] = [
            'fistPage' => $firstPage,
            'lastPage' => $lastPage,
        ];
        return $arr;
    }
}