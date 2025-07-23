<x-mail.basic-layout :message="$message" title="Wallet top up">
    <x-slot name="header">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">

        </table>
    </x-slot>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>

            <td style="padding: 10px 20px; margin: 10px 0;">
                {!! $content !!}
            </td>
        </tr>
{{--        <tr>--}}

{{--            <td style="padding: 10px 20px; border-bottom: 5px solid #fc5000;">--}}
{{--                <p style="margin-top: 50px;">Thank you for being part of {{ get_site_name() }}</p>--}}
{{--            </td>--}}
{{--        </tr>--}}


    </table>
</x-mail.basic-layout>
