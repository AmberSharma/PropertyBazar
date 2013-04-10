crtg_content = '';
function writeCtoCookie(){
document.cookie='cto_trulia=' + escape(crtg_content)+ '; path=/; expires=Fri, 05 Apr 2013 05:20:18 GMT;' + 'domain=.trulia.com; ';
}
writeCtoCookie();