    

</div>

  
<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
        var elemsPicker = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elemsPicker, {
            "format": "yyyy-mm-dd",
            "yearRange" :20
        });
        var elems1 = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems1, {
        "responsiveThreshold": 1
        });
        var elems = document.querySelectorAll('.slider');
        var instances = M.Slider.init(elems, );
        
        
        var elems3 = document.querySelectorAll('select');

        var instances3 = M.FormSelect.init(elems3);
        
    });
    
</script>


</body>
</html>