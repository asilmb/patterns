<form action="[URL]" method="post">
    <textarea name="content" id="editor">
        <h1>Double Dispatch - двойная диспетчеризация</h1>
        <p> </p>public function actionLateDynamicLinking()
        {
        return $this->render('lateDynamicLinking');
        }
    </textarea>
    <p><input type="submit" value="Submit"></p>
</form>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>