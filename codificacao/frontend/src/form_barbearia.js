document.getElementById("saveChangesBtn").addEventListener("click", async () => {
    event.preventDefault();
    const nome = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const endereco = document.getElementById("address").value;
    const telefone = document.getElementById("phone").value;
    const descricao = document.getElementById("description").value;
    const horario_abertura = document.getElementById("openingTime").value;
    const horario_fechamento = document.getElementById("closingTime").value;
    const foto = document.getElementById("photo").files[0];

    const data = {
        nome: nome,
        email: email,
        endereco: endereco,
        telefone: telefone,
        descricao: descricao,
        horario_abertura: horario_abertura,
        horario_fechamento: horario_fechamento,
        foto: foto ? foto.name : null 
    };

    try {
        const response = await fetch("http://127.0.0.1:8000/criar_barbearia", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            alert("Barbearia cadastrada com sucesso!");
            document.getElementById("editBarbershopForm").reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById("editInfoModal"));
            modal.hide();
        } 
        else {
            const error = await response.json();
            alert("Erro ao cadastrar: " + error.detail);
        }
    } catch (err) {
        alert("Erro de conexão com o servidor: " + err.message);
    }
});
