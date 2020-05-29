# POST /oauth/token

+ Request (application/json; charset=utf-8)

        {
            "grant_type": "password",
            "client_id": "2",
            "client_secret": "wPJCjsHiVZVHyNVdJNPDDhjgOzplrGt43U02uBvR",
            "username": "teddyb@sample.com",
            "password": "12345",
            "scope": ""
        }

+ Response 200 (application/json; charset=UTF-8)

    + Headers

            Pragma: no-cache
            X-Powered-By: PHP/7.4.5
            X-RateLimit-Remaining: 59
            X-RateLimit-Limit: 60
            Cache-Control: no-store, private

    + Body

            {"token_type":"Bearer","expires_in":31536000,"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiODc4NmQ0NDQwOGFkYjY3MGFhZTRhOGU0NDUyOTRlZmEwMmQ2ODcxN2VkMzNjMmRhNmZlYzVhMmJhMWNhMDU3YjlkODgwNjdkYTIxNmU3ZDUiLCJpYXQiOjE1OTA3MjExMjQsIm5iZiI6MTU5MDcyMTEyNCwiZXhwIjoxNjIyMjU3MTI0LCJzdWIiOiIyMSIsInNjb3BlcyI6W119.d7ljuWzZOkWH6Skb4bqOuIDyaeV5up4UltZcZE7-PF4dDPTMoMOFD0zHgFC9Yd2XVqVV1glw2lgdI-yLBU_SCbr0JJLwTZuUetIRML1t74eNA4aBThJI98HCIDB4fsWgdDMTfxU_d4jvl_UyXW6znWZpTt2C0GutXOOh7VTLBroi-uDeYMHB2vp-qpufr4yV0Lh_T6T4bAfSNSKkhofqIdcIyxqMNrxh3Uy42K_Nvu6azgZlRY5BpijtEZ4csB1DwdjoBnfBAHIZ-NWrZhfilBQfgTYXM0dmzRdo3HrpJRoAlu0URzx4YiUoQ7-zxD1R-eYApBCrtS7SPCxP5YHj79XLhR6n6930FRBrOakwdwnE6sNDMPm6JzJ6VuY0IP5O0-6BTUM1wXG9O2RKNmiSSDYZpi6stD00knSpJfUaycSi7xe-ogJ8WhUwBY2FVw-XNwHCc_OATXes-aJJ-EkcMJQHz0qyf6SzXtQKJkjCMFfHZrYOJgreYfcsC_99G74PYprEjIfIyAtQszUftiFT-J2IOZryw3SB2KwgAksbWVd8ObIDXek9EJe9n5B81wVkR6VysroHniXal-ij9QLprV8Cg4eAavETSP4caS0J78kR4Im1vkNuxHF6wktA3_YzyBTgrf7wQTr7GGioHY_gVkAfudPD16Gl1gY7lYa50Gc","refresh_token":"def50200ea4758e6496f7b12f6f8a12b2acd8c7ab7aa2971d9a997152cfafc9ea623801aaac8339bc5c8d9affb68461f94e4122ce65b818d3078aa5c64d0fcef4d0616de0f22582c0835dfcdd00aa82436bda3175b63c0c682d711ee2bd16b41aadcd4ef95aa8a42e3738f1f52c008e82e69206e1cf786510611eff239dca60b1129fbf0d01d7721a4ab54d6bf777b07d424fd85802de5fb228fa19208dbd56106e792acc8839734123fb1896097e8ba9ff585a65c761843e479a407d7b929aab25302840f9dd6f8f0c759d829ec6f31002cd24154e821db886f3409beeee93c7a65ad815de193d735d75c0f4b2ed5c81c9b07e5a2bb8c39e6593b07464eb21bd68471c2aa205980743ac744017938e196bd8f738a4cbf6345a5f1b1d62ef5410062c4cb95f3399fe06a2ac684d0883d6d4e4140ef05758772f56851cf701b91b7bc6eb23755a88d63b60b9292e222d270b9326ee89f3ceeaa49b5e5083acf025183"}


# GET /methods

+ Request

    + Headers

            Accept: application/json
            Authorization: 



+ Response 200 (application/json)

    + Headers

            X-Powered-By: PHP/7.4.5
            Cache-Control: no-cache, private
            Vary: Authorization
            X-RateLimit-Limit: 60
            X-RateLimit-Remaining: 59

    + Body

            [{"id":3,"title":"Brank transfer","description":"A bank transfer method","createdAt":"2020-05-23T09:45:36.000000Z","updatedAt":"2020-05-23T09:45:37.000000Z"},{"id":2,"title":"Cash","description":"Cash represented in the supported currency","createdAt":"2020-05-23T09:45:03.000000Z","updatedAt":"2020-05-23T09:45:05.000000Z"},{"id":1,"title":"Credit card","description":"Any supported credit card","createdAt":"2020-05-23T09:44:35.000000Z","updatedAt":"2020-05-23T09:44:37.000000Z"}]


