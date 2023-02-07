const senha= document.getElementById('senha');
const olhoAberto= document.getElementById('aberto_senha');
const olhoFechado= document.getElementById('fechado_senha');

function verSenha(){

    olhoAberto.style.display="none";
    olhoFechado.style.display="block";
    senha.type="text";
}
function esconderSenha(){
    senha.type="password";
    olhoFechado.style.display="none";
    olhoAberto.style.display="block";
}

const confirmacaoSenha= document.getElementById('confirmacao_senha');
const olhoAbertoCS= document.getElementById('aberto_confirmacao_senha');
const olhoFechadoCS= document.getElementById('fechado_confirmacao_senha');

function verConfirmacaoSenha(){
    confirmacaoSenha.type="text";
    olhoFechadoCS.style.display="block";
    olhoAbertoCS.style.display="none";
}
function esconderConfirmacaoSenha(){
    confirmacaoSenha.type="password";
    olhoAbertoCS.style.display="block";
    olhoFechadoCS.style.display="none";
}