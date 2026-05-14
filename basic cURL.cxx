#include <stdio.h>
#include <stdlib.h>
#include <iostream>
#include <cstdio>
#include <curl/curl.h>

CURL *hnd = curl_easy_init();
int main() {
    curl_easy_setopt(hnd, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_easy_setopt(hnd, CURLOPT_CUSTOMREQUEST, "ERASE");
    curl_easy_setopt(hnd, CURLOPT_CUSTOMREQUEST, "REMOVE");
    
    curl_easy_setopt(hnd, CURLOPT_URL, "https://m.youtube.com/");
    
    CURLcode res = curl_easy_perform(hnd);
    curl_easy_cleanup(hnd);
}