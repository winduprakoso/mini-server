@extends('easyadmin::backend.parent')
@section('content')
    @push('mtitle')
        {{ $title }}
    @endpush
    <div class="pc-container">
        <div class="pc-content">

            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            Scan Nameplate
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div id="alert-section"></div>
                            <form action="" method="post">
                                <label for="">Barcode</label>
                                <input type="text" id="id-number" class="form-control">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <table id="tbl-scan-np" class="table">
                              <thead>
                                <tr>
                                  <th>Code</th>
                                  <th>Scanned At</th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                getListNp()
                
                var ajaxLoading = false

                $("#id-number").focus();
                $('#id-number').keyup(delay(function(e) {
                    var code = this.value;
                    if (code.length > 3 && !ajaxLoading) {
                        submitBarcode(code)
                    }
                }, 800));
                // $("#id-number").keyup(function(e) {
                //     var code = e
                //         .key; // recommended to use e.key, it's normalized across devices and languages
                //     var codeId = $(this).val()

                //     if (code === "Enter") e.preventDefault();
                //     if (code === " " || code === "Enter") {
                //         alert("Prohibited!")
                //     }
                // });

                function delay(callback, ms) {
                    var timer = 0;
                    return function() {
                        var context = this,
                            args = arguments;
                        clearTimeout(timer);
                        timer = setTimeout(function() {
                            callback.apply(context, args);
                        }, ms || 0);
                    };
                }
            });

            function submitBarcode(code) {
                const mUrl = "{{url('api/v1/submit-scan-np')}}"
                ajaxLoading = true

                $.post(mUrl, {
                  code: code,
                })
                .done(function(data) {
                  ajaxLoading = false
                  $("#id-number").val("")
                  if (data.status) {
                    getListNp()
                    $("#alert-section").html(mAlert("success", data.message))
                  }else{
                    $("#alert-section").html(mAlert("danger", data.message))
                  }
                });
            }


            function getListNp() {
              const mUrl = "{{url('api/v1/get-scan-np')}}"

              var mHtml = ""
              $.get( mUrl, function( response ) {

                $.each(response.data, function( index, data ) {
                  mHtml += "<tr>"
                  mHtml += "<td>"+data.serial_np+"</td>"
                  mHtml += "<td>"+data.created_at+"</td>"
                  mHtml += "</tr>"
                });

                $("#tbl-scan-np tbody").html(mHtml)
              });
            }


            function mAlert(type, message) {
              var mHtml = '<div class="alert alert-'+type+'" role="alert">'+message+'</div>'

              return mHtml
            }
        </script>
    @endpush
@endsection
