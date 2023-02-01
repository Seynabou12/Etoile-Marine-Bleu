$(function() {
    $("body").on('click', '#btnTestConnection', function(e) {
        let hote = $(this).data('host');
        let identifiant = $(this).data('identifiant');
        let port = $(this).data('port');
        let mot_passe = $(this).data('mot_passe');
        let url = $(this).data('url');
        let data = { hote, identifiant, port, mot_passe };
        let initialText = $(this).text();

        $(this).text('Connexion en cours ...');

        $.ajax({
            type:'POST',
            url,
            data,
            success:function(data){
                if (data.success) {
                    swal("Connexion réussie", data.success, "success");
                } else {
                    swal("Connexion échouée", data.error, "error");
                }
            },
            error: function(e) {
                swal("Erreur serveur", "Une erreur est survenue au moment de l'exécution de la requête. Il se peut que l'extension FTP ne soit pas actif sur votre serveur.", "error");
            },
            complete: function() {
                $("#btnTestConnection").text(initialText);
            }
         });
    });
});
