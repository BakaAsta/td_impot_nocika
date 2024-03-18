document.addEventListener('DOMContentLoaded', function() {
    let nom = document.getElementById("nom");
    let revenuAnnuel = document.getElementById("revenu");
    let bouton_ok = document.getElementById("button_ok");

    function verif_formulaire_ok() {
        var regex_nom = /^[A-Za-z\s]+$/;
        var regex_revenus = /^\d+$/;

        const nom_valide = regex_nom.test(nom.value.trim());
        const revenus_valide = regex_revenus.test(revenuAnnuel.value.trim()) && revenuAnnuel.value.trim() !== '0';

        if (nom_valide && revenus_valide) {
            bouton_ok.disabled = false;
            nom.style.borderColor = 'green';
            nom.style.borderWidth = '2px'
            revenuAnnuel.style.borderColor = 'green';
            revenuAnnuel.style.borderWidth = '2px'
            bouton_ok.style.backgroundColor = "#00ff47"
        } else {
            bouton_ok.disabled = true;
            nom.style.borderColor = nom_valide ? 'green' : 'red';
            nom.style.borderWidth = '2px'
            revenuAnnuel.style.borderColor = revenus_valide ? 'green' : 'red';
            revenuAnnuel.style.borderWidth = '2px'
            bouton_ok.style.backgroundColor = "#494646"
        }
    }

    nom.addEventListener('input', verif_formulaire_ok);
    revenuAnnuel.addEventListener('input', verif_formulaire_ok);
});
