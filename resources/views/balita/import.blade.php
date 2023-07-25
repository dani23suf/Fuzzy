<html>
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <input type="file" name="balita" id="">
        <button type="submit">Import</button>
    </form>
</html>