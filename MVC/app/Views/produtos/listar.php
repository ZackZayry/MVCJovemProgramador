<main class="container">
    <div class="column">
        <div></div>
        <div>
        <form role="search" style="width: 50%; float:right" action="<?= url_to('produtos/buscar')?>" method="post" >
            <input name="busca" type="search" placeholder="Buscar..."/>
            <input type="submit" value="Search" name="btnBuscar"/>
        </form>        
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Promoção</th>
                    <th>% Promoção</th>
                    <th> Opções </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $produto):?>
                <tr>
                    <td><?= $produto->nome?></td>
                    <td><?= $produto->descricao?></td>
                    <td><?= $produto->preco?></td>
                    <td><?= $promo = $produto->promocao?"Sim":"Não"?></td>
                    <td><?= $produto->taxa_promocao?></td>
                    <td>
                        <a href="http://localhost/ProgramadorWebSenac/MVC/produtos/editar/<?= $produto->id?>">Editar</a>
                        <a href="http://localhost/ProgramadorWebSenac/MVC/produtos/excluir/<?= $produto->id?>">Excluir</a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>


        </div>
        <div></div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', ()=>{
        const btnBuscar = document.getElementsByName('btnBuscar')[0];
        btnBuscar.addEventListener('click', ev=>{
            ev.preventDefault();
            let termo = document.querySelector('input[name="busca"]').value;
            let url = document.forms[0].action;
            let corpo = new FormData();
            corpo.set('produto', termo);
            fetch(url, {
                method : "POST",
                headers: {
                    'Accept': 'application/json'
                },
                body: corpo
            }).then(response =>{
                console.log(response);
                if(!response.ok){
                    throw new Error(`Erro ${response.status} - ${response.statusText}`);
                }
                return response.json();
            }).then(dados =>{
                console.log(dados);
                let tbody = document.querySelector('table>tbody');
                tbody.innerHTML="";
                dados.forEach(element =>{
                    let linha = tbody.insertRow(0);
                    linha.insertCell(0).appendChild(document.createTextNode(element.nome));
                    linha.insertCell(1).appendChild(document.createTextNode(element.descricao));
                    linha.insertCell(2).appendChild(document.createTextNode(element.preco));
                    linha.insertCell(3).appendChild(document.createTextNode((element.promocao == 1)?"Sim":"Não"));
                    linha.insertCell(4).appendChild(document.createTextNode(element.taxa_promocao));

                    let editar = document.createElement('a');
                    editar.setAttribute('href', `http://localhost/ProgramadorWebSenac/MVC/produtos/editar/${element.id}`);
                    editar.textContent = `Editar`;

                    let excluir = document.createElement('a');
                    excluir.setAttribute('href', `http://localhost/ProgramadorWebSenac/MVC/produtos/excluir/${element.id}`);
                    excluir.textContent = `Excluir`;


                    linha.insertCell(5).appendChild(editar).parentNode.appendChild(excluir);
                })
            })
        })
    })
</script>