@extends("layouts.app")

@section("content")
<div class="container">
    <h1>Rates Books</h1>
    <form id="form_rating" method="post">
        {{ csrf_field() }}
        <div class="col-md-12 col-12">
            <div class="row">
                <div class="col-12 col-md-12 mt-4">
                    <label> Book Author </label>
                    <select class="form-control" id="books_author" name="books_author" required onchange="set_book(this)">
                    </select>
                </div>
                <div class="col-12 col-md-12 mt-4">
                    <label> Book Name </label>
                    <select class="form-control" required id="id_books" name="id_books" disabled></select>
                </div>
                <div class="col-12 col-md-12 mt-4">
                    <label> Rating </label>
                    <select class="form-control" required id="rates" name="rates">
                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i  }}</option>
                            @endfor
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-12 mt-4 d-flex  justify-content-end">
                <button class="btn btn-primary"> Submit </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section("rating_scripts")
<script type="text/javascript">
    let path = "{{ route('list_author') }}";
    let path_books = "{{ route('list_books') }}";
    let author_id = "";

    function set_book(input) {
        author_id = input.value;

        $('#id_books').val(author_id);

        $.ajax({
            type: "GET"
            , url: "{{ route('list_books')}}"
            , data: "author_id=" + author_id
            , dataType: "json"
            , success: function(data) {
                $("#id_books").html("");
                $.each(data, function(index, element) {
                    $("#id_books").append("<option value='" + element.id + "'>" + element.books_name + "</option>");
                })
            }
        });

        $("#id_books").prop("disabled", 0);
    }

    $("#form_rating").submit(function(e) {
        e.preventDefault();

        let form_params = $(this).serialize();

        $.ajax({
            type: "POST"
            , data: form_params
            , url: "{{ route('books_rating.post_rating') }}"
            , dataType: "json"
            , success: function(data) {

            }
        })
    });

    $('#books_author').select2({
        placeholder: 'Select an author'
        , ajax: {
            url: path
            , dataType: 'json'
            , delay: 250
            , processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.author_name
                            , id: item.id
                        }
                    })
                };
            }
            , cache: true
        }
    });

    /* $('#id_books').select2({
        placeholder: 'Select a book'
        , ajax: {
            url: path_books + "?id_author=" + author_id
            , dataType: 'json'
            , delay: 250
            , processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.books_name
                            , id: item.id
                        }
                    })
                };
            }
            , cache: true
        }
    });
    */

</script>
@endsection
