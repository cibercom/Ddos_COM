#include <iostream>
#include <curl/curl.h>

int main() {
    CURL *curl;
    CURLcode res;
 curl_global_init(CURL_GLOBAL_DEFAULT);
    curl = curl_easy_init();

    if(curl) {
        
        curl_easy_setopt(curl, CURLOPT_URL, "https://m.youtube.com/");
        
        curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "DEL");
        curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "DELETE");
         curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "ERASE");
          curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "REMOVE");
        curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "CLEAR");
          
        res = curl_easy_perform(curl);

        if(res != CURLE_OK) {
            fprintf(stderr, "curl_easy_perform() failed: %s\n", curl_easy_strerror(res));
        } else {
            std::cout << "Delete request successful" << std::endl;
        }

        curl_easy_cleanup(curl);
    }

    curl_global_cleanup();

    return 0;
}
