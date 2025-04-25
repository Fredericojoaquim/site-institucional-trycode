<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container text-md-left">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                <h5 class="text-uppercase font-weight-bold"> <img src="{{asset('home/img/logo.png')}}" alt="Logo" class="mb-2" style="width: 150px;"></h5>
               
                <p><strong>WhatsApp:</strong> +244 947 042 925</p>
                <p><strong>Telemovel:</strong> 947 042 925 / 956 006 534</p>
                <p><strong>E-mail:</strong> geral@trycode-angola.com</p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h5 class="text-uppercase font-weight-bold">Serviços</h5>
                <p><a href="#" class="text-white">Hosepdagem</a></p>
                <p><a href="#" class="text-white">Domínios</a></p>
                <p><a href="#" class="text-white">Websites</a></p>
                <p><a href="#" class="text-white">Desenvolvimento de software</a></p>
                <p><a href="#" class="text-white">Consultoria em Análise de Dados</a></p>
                <p><a href="#" class="text-white">Formação</a></p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h5 class="text-uppercase font-weight-bold">Hospedagem</h5>
                @if(isset($pacotes))

                    @foreach($pacotes as $p)

                     <p><a href="#" class="text-white">{{$p->nomepacote}}</a></p>
                        
                    @endforeach
                    
                @endif
                
                
            
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
                <h5 class="text-uppercase font-weight-bold">Newsletters</h5>
                <p>Assine a nossa newsletters</p>
                <form>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Digite o seu email">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">&gt;</button>
                        </div>
                    </div>
                </form>
                <p><a href="#" class="text-white">Termos e Políticas</a></p>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <p>&copy; 2025 Todos os Direitos Reservados. TryCode</p>
            </div>
            <div class="col-md-6 col-lg-6 text-md-right">
                <a href="https://www.facebook.com/trycode.ao/" target="_BLANK" class="text-white mx-2"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
            </div>
        </div>
        <div class="position-fixed bottom-0 end-0 p-3">
            <a href="https://wa.me/244947042925?text=Oi%20estou%20interessado%20no%20serviço!" class="btn btn-success rounded-circle p-3" target="_blank" aria-label="Fale conosco no WhatsApp"><i class="fab fa-whatsapp fa-lg"></i></a>
    </div>
</footer>
