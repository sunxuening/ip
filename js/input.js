function addListener(element,e,fn){    
    	 	if(element.addEventListener){    
          		element.addEventListener(e,fn,false);    
     		 } else {    
        	 		element.attachEvent("on" + e,fn);    
   	 				}    
			}
			var ipadd = document.getElementById("ipadd");
			addListener(ipadd,"click",function(){
				ipadd.value = "";
			})
			
			addListener(ipadd,"blur",function(){
              if(ipadd.value ==""){
				ipadd.value = "请输入要查询的Ip地址或域名";
                }
			})