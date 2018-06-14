<?php

namespace App\Utils;

/**
 * Repo Helper
 *
 * @author tkaniowski
 */
class RepoHelper {

    /**
     *
     * Makes api call and puts data into Repo object
     *
     * @param string $url
     * @param \App\Entity\Repo $repo
     *
     */
    public static function callApi($url, \App\Entity\Repo $repo) {

        $client = new \GuzzleHttp\Client();
        $url = self::translateUrl($url);
        $res = $client->request('GET', $url, array('exceptions' => false));

        if ($res->getStatusCode() == 200) {
            $body = json_decode($res->getBody());
            $pulls_open_res = $client->request('GET', $url . '/pulls?state=open&per_page=100');
            $pulls_closed_res = $client->request('GET', $url . '/pulls?state=closed&per_page=100');

            $repo->setName($body->name);
            $repo->setForks($body->forks);
            $repo->setStars($body->stargazers_count);
            $repo->setWatchers($body->subscribers_count);
            $repo->setLastRelease($body->updated_at);

            $repo->setPullsOpen(self::pullRequestFormater(count(json_decode($pulls_open_res->getBody()))));
            $repo->setPullsClosed(self::pullRequestFormater(count(json_decode($pulls_closed_res->getBody()))));
        }
    }

    /**
     * 
     * @param int $pulls
     * @return strng
     */
    public static function pullRequestFormater($pulls) {
        if ($pulls >= 100) {
            return '>=' . $pulls;
        } else {
            return $pulls;
        }
    }
    
    /**
     * 
     * @param strng $url
     * @return strng
     */
    public static function translateUrl($url){
        
        return str_replace('https://github.com/', 'https://api.github.com/repos/', $url);
    }

}
