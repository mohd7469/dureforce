<div style="box-sizing: border-box; background: rgba(239, 248, 248, 0.86) url({{ isset($email_data['email_template']->attachments->url) ? $email_data['email_template']->attachments->url : 'https://stgdureforcestg.blob.core.windows.net/attachments/638f83fb2fea31670349819.png' }}) no-repeat;  border: 1px solid rgba(203, 223, 223, 0.32); border-radius: 8px; padding-bottom: 220px;
    background-size: 80%; background-position: center 66%; margin: 24px 0px 24px 0px; position: relative; width: 100%;height:500px; display:inline-block" class="tp-bg">
          {{-- <span style=" width: 156px; margin: 20px auto 0px;  display: block;  position: relative; z-index: 2;" class="logo-con_mbl"><img src="https://stgdureforcestg.blob.core.windows.net/attachments/638f83e4cecdd1670349796.png" alt="congrts"></span>  --}}
          <h1 style="font-family: 'Mulish', sans-serif; font-style: normal; font-weight: 800;  font-size: 28px;  line-height: 35px;
          text-align: center;  color: #007F7F;  margin: 65px 15px 30px 15px; position: relative; z-index: 2; word-break:break-all;">{{$email_data['email_template']['title']}}</h1>
         <p style="box-sizing: border-box; font-weight: 600; font-size: 16px;  line-height: 20px;  text-align: center; color: #000000;  font-family: 'Mulish', sans-serif;
 position: relative;  z-index: 2;">{{$email_data['email_template']['description']}}</p>
         
    </div>
 