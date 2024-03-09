programa {
  funcao inicio() {
    //Esse algoritmo identifica se um número é maior do que 10 e menor ou igual a 50
    inteiro a

    escreva("Escreva um número: ")
    leia(a)

    se(a > 10 e a <=50){
      escreva("O número informado é maior que 10 e menor ou igual a 50")
    }
    senao se(a < 10 ou a > 50){
      escreva("Esse número é menor que 10 ou maior que 50")
    }
    senao{
      escreva("Input invalido")
    }
  }
}
