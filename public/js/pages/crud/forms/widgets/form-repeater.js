// Class definition
var KTFormRepeater = function() {

    // Private functions
    var demo1 = function() {
        $('#kt_repeater_1').repeater({
            initEmpty: false,
           
            defaultValues: {
                'text-input': 'foo'
            },
             
            show: function () {
                $(this).slideDown();

                //$(this).find('#province').attr('')

                

                $('.select2-container').remove();
                $('.province').select2({
                placeholder: "Select Province",
                allowClear: true,
                });
                $('.district').select2({
                placeholder: "Select District",
                allowClear: true,
                });
                $('.subdistrict').select2({
                placeholder: "Select Subdistrict",
                allowClear: true,
                });
                $('.village').select2({
                placeholder: "Select Village",
                allowClear: true,
                });
                $('#province').attr({'id': 'province2', 'data-select2-id': 'province2'});
                $('#district').attr({'id': 'district2', 'data-select2-id': 'district2'});
                $('#subdistrict').attr({'id': 'subdistrict2', 'data-select2-id': 'subdistrict2'});
                $('#village').attr({'id': 'village2', 'data-select2-id': 'village2'});
                $('.select2-container').css('width','100%');
                $('#province2').select2({
                    placeholder: "Select Province",
                    allowClear: true,
                    });
                    $('#district2').select2({
                    placeholder: "Select District",
                    allowClear: true,
                    });
                    $('#subdistrict2').select2({
                    placeholder: "Select Subdistrict",
                    allowClear: true,
                    });
                    $('#village2').select2({
                    placeholder: "Select Village",
                    allowClear: true,
                    });

                        $.ajaxSetup({
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                        });

                        $.ajaxSetup({
                            beforeSend: function(xhr, type) {
                                if (!type.crossDomain) {
                                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                                }
                            },
                        });
                        
                        $('#province').on('change', function () {
                            $.ajax({
                                url: "{{ route('getDistrict') }}",
                                method: 'POST',
                                data: {provinceNo: $(this).val(), _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#district').empty();
                                    $('#subdistrict').empty();
                                    $('#village').empty();
                                    $.each(response, function (districtNo, districtName) {
                                        $('#district').append(new Option(districtName, districtNo))
                                    })
                                }
                            })
                        });
                    
                        $('#district').on('change', function () {
                            var provNo = document.getElementById('province').value;
                            //alert(provNo);
                            $.ajax({
                                url: "{{ route('getSubdistrict') }}",
                                method: 'POST',
                                data: {districtNo: $(this).val(), provinceNo: provNo, _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#subdistrict').empty();
                                    $('#village').empty();
                                    $.each(response, function (subdistrictNo, subdistrictName) {
                                        $('#subdistrict').append(new Option(subdistrictName, subdistrictNo))
                                    })
                                }
                            })
                        });
                    
                        $('#subdistrict').on('change', function () {
                            var provNo = document.getElementById('province').value;
                            var distNo = document.getElementById('district').value;
                            //alert(provNo);
                            $.ajax({
                                url: "{{ route('getVillage') }}",
                                method: 'POST',
                                data: {subdistrictNo: $(this).val(), districtNo: distNo, provinceNo: provNo, _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#village').empty();
                                    $.each(response, function (villageNo, villageName) {
                                        $('#village').append(new Option(villageName, villageNo))
                                    })
                                }
                            })
                        });
                    
                        
                        $('#province2').on('change', function () {
                            $.ajax({
                                url: "{{ route('getDistrict') }}",
                                method: 'POST',
                                data: {provinceNo: $(this).val(), _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#district2').empty();
                                    $('#subdistrict2').empty();
                                    $('#village2').empty();
                                    $.each(response, function (districtNo, districtName) {
                                        $('#district2').append(new Option(districtName, districtNo))
                                    })
                                }
                            })
                        });
                    
                        $('#district2').on('change', function () {
                            var provNo = document.getElementById('province2').value;
                            //alert(provNo);
                            $.ajax({
                                url: "{{ route('getSubdistrict') }}",
                                method: 'POST',
                                data: {districtNo: $(this).val(), provinceNo: provNo, _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#subdistrict2').empty();
                                    $('#village2').empty();
                                    $.each(response, function (subdistrictNo, subdistrictName) {
                                        $('#subdistrict2').append(new Option(subdistrictName, subdistrictNo))
                                    })
                                }
                            })
                        });
                    
                        $('#subdistrict2').on('change', function () {
                            var provNo = document.getElementById('province2').value;
                            var distNo = document.getElementById('district2').value;
                            //alert(provNo);
                            $.ajax({
                                url: "{{ route('getVillage') }}",
                                method: 'POST',
                                data: {subdistrictNo: $(this).val(), districtNo: distNo, provinceNo: provNo, _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#village2').empty();
                                    $.each(response, function (villageNo, villageName) {
                                        $('#village2').append(new Option(villageName, villageNo))
                                    })
                                }
                            })
                        });
                    
                    
                    
                    

                
            },

            hide: function (deleteElement) {                
                $(this).slideUp(deleteElement);                 
            },
            isFirstItemUndeletable: true
        });
    }

    var demo2 = function() {
        $('#kt_repeater_2').repeater({
            initEmpty: false,
           
            defaultValues: {
                'text-input': 'foo'
            },
             
            show: function() {
                $(this).slideDown();                               
            },

            hide: function(deleteElement) {                 
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }                                
            }      
        });
    }


    var demo3 = function() {
        $('#kt_repeater_3').repeater({
            initEmpty: false,
           
            defaultValues: {
                'text-input': 'foo'
            },
             
            show: function() {
                $(this).slideDown();                               
            },

            hide: function(deleteElement) {                 
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }                                  
            }      
        });
    }

    var demo4 = function() {
        $('#kt_repeater_4').repeater({
            initEmpty: false,
           
            defaultValues: {
                'text-input': 'foo'
            },
             
            show: function() {
                $(this).slideDown();                               
            },

            hide: function(deleteElement) {              
                $(this).slideUp(deleteElement);                                               
            }      
        });
    }

    var demo5 = function() {
        $('#kt_repeater_5').repeater({
            initEmpty: false,
           
            defaultValues: {
                'text-input': 'foo'
            },
             
            show: function() {
                $(this).slideDown();                               
            },

            hide: function(deleteElement) {              
                $(this).slideUp(deleteElement);                                               
            }      
        });
    }

    var demo6 = function() {
        $('#kt_repeater_6').repeater({
            initEmpty: false,
           
            defaultValues: {
                'text-input': 'foo'
            },
             
            show: function() {
                $(this).slideDown();                               
            },

            hide: function(deleteElement) {                  
                $(this).slideUp(deleteElement);                                                
            }      
        });
    }
    return {
        // public functions
        init: function() {
            demo1();
            demo2();
            demo3();
            demo4();
            demo5();
            demo6();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormRepeater.init();
});

    