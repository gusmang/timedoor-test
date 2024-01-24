@extends("layouts.app")

@section("content")
<div class="container">
    <h1>Books List</h1>
    <div class="mb-4 mt-4">
        <form method="GET">
            <label>Search Data: </label>
            <input type="text" value="{{ isset($_GET['search_text']) ? $_GET['search_text'] : '' }}" name="search_text" id="search_text" class="form-control" placeholder="Search By Books or Author Name ..." />
        </form>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Books Name</th>
                <th>Category</th>
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
        let searchtext = "{{ isset($_GET['search_text']) ? $_GET['search_text'] : '' }}";
        var table = $('.data-table').DataTable({
            processing: true
            , serverSide: true
            , searching: false
            , ajax: "{{ url('/booklist')}}" + '?search_text=' + searchtext
            , columns: [{
                    "data": 'DT_RowIndex'
                    , orderable: false
                    , searchable: false
                }
                , {
                    data: 'books_name'
                    , name: 'books_name'
                }
                , {
                    data: 'category_name'
                    , name: 'category_name'
                }
                , {
                    data: 'author_name'
                    , name: 'author_name'
                }
                , {
                    data: 'avg_rating'
                    , name: 'avg_rating'
                }
                , {
                    data: 'voter'
                    , name: 'voter'
                }

            , ]
            , order: [
                [4, 'desc']
            ]
        });


    });

</script>
@endsection
