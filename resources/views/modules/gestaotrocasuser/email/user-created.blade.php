<h3>{{config_path('app.name')}}</h3>
<p>Sua conta na pltaforma foi criada</p>
<p>Usuário: <strong>{{$user->email}}</strong></p>
<p>
    <?php $link = route('gestaotrocasuser.email-verification.check', $user->verification_token).'?email='.urlencode($user->email); ?>
    Clique aqui para verificar sua conta <a href="{{$link}}">{{$link}}</a>
</p>
<p>Obs.: Não responda este email, ele é gerado automaticamente</p>