programa {
  funcao inicio() {
    //Esse algoritmo identifica se um n�mero � maior do que 10 e menor ou igual a 50
    inteiro a

    escreva("Escreva um n�mero: ")
    leia(a)

    se(a > 10 e a <=50){
      escreva("O n�mero informado � maior que 10 e menor ou igual a 50")
    }
    senao se(a < 10 ou a > 50){
      escreva("Esse n�mero � menor que 10 ou maior que 50")
    }
    senao{
      escreva("Input invalido")
    }
  }
}
