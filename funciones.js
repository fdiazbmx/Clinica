$(document).ready(function(){
   console.log('jquery');
   
   $("#modal").submit(function(e){
       console.log('enviando');
       e.preventDefault();
   });  
});