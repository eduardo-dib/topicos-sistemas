using API.Models;
using Microsoft.AspNetCore.Mvc;

var builder = WebApplication.CreateBuilder(args);

//Registrar o serviço de banco de dados na aplicação
builder.Services.AddDbContext<AppDataContext>();

var app = builder.Build();

List<Produto> produtos = new List<Produto>();

// Endpoints = Funcionalidades - JSON
// POST: http://localhost:5076/api/produto/cadastrar
app.MapPost("/api/produto/cadastrar", ([FromBody] Produto produto,
    [FromServices] AppDataContext context) =>
{
    //Adicionando o produto dentro da tabela no banco de dados
    context.Produtos.Add(produto);
    context.SaveChanges();
    return Results.Created($"/api/produto/buscar/{produto.Id}", produto);
});

// GET: http://localhost:5076/api/produto/listar
app.MapGet("/api/produto/listar", ([FromServices] AppDataContext context) =>
{
    if (context.Produtos.Any())
    {
        return Results.Ok(context.Produtos.ToList());
    }
    return Results.NotFound("Não existem produtos na tabela");
});

// GET: http://localhost:5076/api/produto/buscar/{iddoproduto}
app.MapGet("/api/produto/buscar/{id}", ([FromRoute] string id,
    [FromServices] AppDataContext context) =>
{
    Produto? produto = context.Produtos.FirstOrDefault(x => x.Id == id);

    if (produto is null)
    {
        return Results.NotFound("Produto não encontrado!");
    }
    return Results.Ok(produto);
});

// DELETE: http://localhost:5076/api/produto/deletar/{iddoproduto}
app.MapDelete("/api/produto/deletar/{id}", ([FromRoute] string id, [FromServices] AppDataContext context) =>
{
    var produto = context.Produtos.Find(id);
    if (produto == null)
    {
        return Results.NotFound($"Produto com o ID {id} não encontrado.");
    }

    context.Produtos.Remove(produto);
    context.SaveChanges();
    
    return Results.Ok($"Produto com o ID {id} foi deletado com sucesso.");
});


// PUT: http://localhost:5076/api/produto/alterar/{iddoproduto}
app.MapPut("/api/produto/alterar/{id}", ([FromRoute] string id, [FromBody] Produto produtoAlterado, [FromServices] AppDataContext context) =>
{
    var produtoExistente = context.Produtos.Find(id);

    if (produtoExistente == null)
    {
        return Results.NotFound("Produto não encontrado!");
    }

    // Atualiza as propriedades do produto existente com as do produto alterado
    produtoExistente.Nome = produtoAlterado.Nome;
    produtoExistente.Descricao = produtoAlterado.Descricao;
    produtoExistente.Preco = produtoAlterado.Preco;

    context.SaveChanges();

    return Results.Ok("Produto alterado com sucesso!");
});

app.Run();

//CONFIGURAR O BANCO NA APLICAÇÃO
//1 - Quais as bibliotecas serão instaladas no projeto
//2 - O que é necessário adicionar/alterar no projeto
//para configurar a aplicação com o banco

//dotnet add package Microsoft.EntityFrameworkCore.Sqlite 
//--version 8.0.3
//dotnet add package Microsoft.EntityFrameworkCore.Design 
//--version 8.0.3 

//EXERÍCIOS PARA O EF
//1 - Cadastrar o objeto de produto no banco
//2 - Listar os registros da tabela