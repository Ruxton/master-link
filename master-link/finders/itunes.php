<?php
class MasterLinkiTunesFinder implements MasterLinkIFinder {
  private static $uri_base = "https://itunes.apple.com/lookup?upc=%d";

  public function __construct() {
  }

  public function find($upc) {
    $searchData = $this->getData($upc);
    if($searchData->resultCount > 0) {
      return $searchData->results[0]->collectionId;
    }
    return null;
  }

  private function searchURI($upc) {
    return sprintf(MasterLinkiTunesFinder::$uri_base,$upc);
  }

  private function getData($upc) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $this->searchURI($upc));
    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result);
  }
}
?>
