<?php
namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Log;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
class AlipayController extends Controller{
    protected $config = [
        'app_id' => '2016100100643043',//你创建应用的APPID
        'notify_url' => 'http://www.1904.com/notify',//异步回调地址
        'return_url' => 'http://www.1904.com/return',//同步回调地址
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkbOHGyo58nVFEB0MzEsaYj9aW15To8HGB0q0ENjSEhaZ7cTELbrBgmQtDJ6kksida4d6+zyDcTtsC612hbNfEAaSf/DAxUy+UOP4fLCQl0Jfhbip+yzaQZjRGdBMJb5sJB/4qXomGTd+MRauXusZNB9IUn/PyOTTqOqD78TqtoeUNAVwVyA4Ycz5q++RRUsKjgglDlBLpDL2ezg0umDBEfEteaekM/Dc8mwIymy5FhEnLk8i40kStkesfeCc3x2lanplWsLSIVneLDolXmsdsdsNnC25agF0XcJ1Whiu3s8EV/LOCxKBMoEGupnsB5PYhTmGX/NDmXauGNb8JRplfwIDAQAB',//是支付宝公钥，不是应用公钥,  公钥要写成一行,不要换行
        // 加密方式： **RSA2**
        //密钥,密钥要写成一行,不要换行
        'private_key' => 'MIIEowIBAAKCAQEAnu+uE9Mwe0kOTO0R/kAJkFZZh53ekWpP4Rk2ezI174F4kjWVj+cuqQxGZbkUf0aUnUZkzls2bGxWjp/Lu0CvfNYqrdkNOryR+CGkFxRZn9AOHGeMSZafuf9ypj4q6zEz4dq4/43LhqFdl8rcWY8fwYL+XYh3TKg7I6sOZuEwk6f3TipNlCCn28qtwm9OGJrK6fdxgi8wWOu1I89xgzQIyAIyOh+b+GKAI6/zv0mV50HmaSHjE1QpGDA7P80Q1fRdLVegFmvrvit+Y50tRl7nHlFmCncig2cxq9A1P2v0R9kweZHax7oo/oQtZ8TkvxsX6eAwd8zWzqSvsVG+E3RKowIDAQABAoIBAGo7sDJGHgi5uxpF95nm+b2FShBwwByYX84IiTbtR8nP02R+9noaP0D1GHTTsdSku58oNycLJqRwAacRPh7qTKH3kM1k4AfblQGykrhufL1qVpQ7zjQ9voOXL+3Ybd2IpLIY/UCraVeSsjlMed5O4R36TcT8+yi85dKgel7ftBVsyRGPZmuFkN4UKjwXTOgCbxJO4RXOvsTpUFOAx46yP3IU1M1k6tSHFmVsKD729okN9rljKWraHaAnB9uTve+vx4z2kCNWWyGHAzGszowibTp11HoE3LtjEP2lKIOK+TWMGNCUHFqXSqQ7RAao7xDGCF+V9fvG+NnHVBTNUDLajokCgYEAznbrypparSd70nr+pXJkie6wGf8ZFQ/uPOKIqiVxAvgbgZ22sX5oFO/HQCI5I/NFrtZ09OWt5z76EHJxi+bWPBcLySBiN+/eeLLTE4IasPCH8m0R4fnxnjDYzk1MkWVEJCaesef9dpjyXVYsb538cAXlL++SRzxcHhv4eVwsTe8CgYEAxRGQvOuSg5kiA1m2HZ9iUVc01NKbln92WmqKeextvTuHq/CzXkM+NebZ/na8zrvNmyFz86R327c68pWbd9LCDeoG04r6Lv/yDI2pIgTTgCRoJeUwJfxfZUXawmVOfbNWPVuWfA90wr1WJ6YJExi7oIL++QSnxXeNNU93/aImgo0CgYA3cjhgcJNpbPET1XQNemsFn9QrJxbVUTHpp+yLxQJUiczZQkGN6SSKetpHnuk5flt4WJ+QJR5Ou9rsD8/ugk+GU6oWmVvHKePVBjEpTAde/TmFIUVsKnN4yCVxQdEOOuPR0Y1MucCX2Ps9labZUtQ4QV0LQotGFi+m5lwUO2yqgQKBgCNuaA5/cEU22BWwIH0s9dlYC4ikIRMq8ZWKCEGpj4VxWZBBY450GpBIZDNLF+E3hNz6Y8WPcXlQdUm+OkiN3RPxWq7YEuk2XUeChME4CurEIPGHRmPd/yzPJWjEHBufjcbUW7cMdFq6/e18/a6wSLOwObV978giGYJXOmSgrbnVAoGBALxoFLgjSilgDRpa7QX4ec2GtvjFJkWjvl9wrDNi2qGRZOsokd+NopnLnQC0iMYQY8b8dhKG3egYmLQQhm7xgVI9rn2O/mftL9T5PKDwF2A/hDjpe95JiqShXPkSnTj6v7THtj+Vj6mdWWbrUzoH9IIAjbRNpvhbZvc4iw1YIlRF',
        'log' => [ // optional
            'file' => './logs/alipay.log',
            'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [ // optional
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
            // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
        ],
        'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
    ];
    public function Alipay()
    {
        $order = [
            'out_trade_no' => time(),
            'total_amount' => '0.1',
            'subject' => 'test subject - 测试',
        ];

        $alipay = Pay::alipay($this->config)->web($order);

        return $alipay;
    }

    public function AliPayReturn()
    {
        $data = Pay::alipay($this->config)->verify(); // 是的，验签就这么简单！

        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
    }

    public function AliPayNotify()
    {
        $alipay = Pay::alipay($this->config);

        try{
            $data = $alipay->verify(); // 是的，验签就这么简单！

            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
            // 4、验证app_id是否为该商户本身。
            // 5、其它业务逻辑情况

            Log::debug('Alipay notify', $data->all());
        } catch (\Exception $e) {
             //$e->getMessage();
        }

        return $alipay->success();
    }
}