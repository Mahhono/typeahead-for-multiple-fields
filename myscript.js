<html>
<head>
  <!-- ...................-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
      // The names of the fields from the database that will be searched are added to this array.
      // The name of this array is used in the typeahead script.
      var global_arr__keys_check = ['user_name', 'user_login'];
  </script>
  <script  type="text/javascript" src="/js/typeahead-mahhono-2025-08-11.js"></script>  
  <!-- ...................-->
</head>
<body>
    // code
        $('.typeahead').typeahead({
            source: function(query, result)
            {
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{
                        query: query
                    },
                    dataType:"json",
                    success:function(data) {
                        return result(data);
                    }
                })
            },
            items: 30, 
            afterSelect: function (item) { 
              // my line selection code
            }
        });


</boby>
</html>
