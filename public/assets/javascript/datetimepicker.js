window.addEventListener('DOMContentLoaded', (event) => {
    //datetimepicker za dodavanje vremena i trajanja putnog osiguranja
    $(function() {
        $('#datum_isteka_ps').datepicker({
            dateFormat: "dd.mm.yy",
        });
        $("#datum_putovanja").datepicker({
            dateFormat: "dd.mm.yy", 
            minDate:  0,
            onSelect: function(){
                var date2 = $('#datum_putovanja').datepicker('getDate');
                date2.setDate(date2.getDate()+10);
                $('#datum_isteka_ps').datepicker('setDate', date2);
                $('#datum_isteka_ps1').val($('#datum_isteka_ps').datepicker('setDate', date2).val());
            }
        });
        
    })

})