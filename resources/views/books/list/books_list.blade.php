@extends("layouts.app")

@section("content")
<div class="container">
    <h1>Books List</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Books Name</th>
                <th>Author</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@section("author_scripts")
<script type="text/javascript">
    $(function() {
        let page = 0;
        var table = $('.data-table').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ url('/booklist')}}"
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }, {
                    data: 'id_books_category'
                    , name: 'id_books_category'
                }
                , {
                    data: 'books_name'
                    , name: 'books_name'
                }
                , {
                    data: 'id_books_author'
                    , name: 'id_books_author'
                }
                , {
                    data: 'rating'
                    , name: 'rating'
                }
                , {
                    data: 'voter'
                    , name: 'voter'
                }

            , ]
        });



    });

</script>
@endsection
