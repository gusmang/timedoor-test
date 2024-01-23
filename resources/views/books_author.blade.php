@section("content")

<div class="container">
    <h1>Author List</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Author</th>
                <th>Votes</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@section("author_footer")
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('books_author.index') }}"
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                , {
                    data: 'author_name'
                    , name: 'author_name'
                }
                , {
                    data: 'votes'
                    , name: 'votes'
                }

            , ]
        });

    });

</script>
@endsection

</html>
