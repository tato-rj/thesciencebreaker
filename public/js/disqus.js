/**
 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
 */
var disqus_config = function () {
    this.page.url = window.location.href;
    this.page.identifier = $('meta[name="disqus:slug"]').attr('content');
    this.page.title = $('meta[name="disqus:title"]').attr('content');
};

(function() {  // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
    var d = document, s = d.createElement('script');
    
    s.src = 'https://thesciencebreaker.disqus.com/embed.js';  // IMPORTANT: Replace EXAMPLE with your forum shortname!
    
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
