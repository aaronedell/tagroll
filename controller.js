$(document).ready(function(){ 

	$.ajax({
        url: 'checktagbox.php',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    var html;    
                    for (var i=0;i<data.length;i++){
                    	var tagboxresults = data[i]['detail']['tagbox'];
                        
                    	var image = data[i]['detail']['thumbnail'];

                    	html += "<div class='col-md-3'><div class='panel panel-default'><div class='panel-body' style='min-height: 300px; max-height: 300px;'> <img src='"+image+"' height=100><br>";
                    	html += "Tagbox Results: <br>";

                        for (var z=0;z<tagboxresults['custom_tags'].length;z++){

                            html += tagboxresults['custom_tags'][z]['tag']+"<br>";
                                    
                        }

                        for (var k=0;k<tagboxresults['tags'].length;k++){
                            
                            html += tagboxresults['tags'][k]['tag']+"<br>";  

                        } 

                        html += "</div></div></div> ";
                    	
                    }

                    $('#filmstrip').html(html);
                }    
            
    })


})
