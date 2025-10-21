<main class="container">

<div class="grid">
    <div></div>
</div>
<div></div>
<div>
    <form action="<?= url_to('usuario/create')?>" method="post" enctype="multipart/form-data">
        <fildset>
            <label>
                Nome Completo:
                <input type="text" name="nome" id="nome" placeholder="Nome completo" required>
            </label>
            <label>
                email::
                <input type="email" name="email" id="email" placeholder="Email@email.com" required>
            </label>
            <label>
               Senha:
                <input type="password" name="senha" id="senha" placeholder="Senha..." required>
            </label>
            <label>
                Confirmar Senha:
                 <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar senha..." required>
            </label>
            <input type="submit" value="Cadastrar">
        </fildset>
    </form>
</div>
<div></div>
<div></div>

</main